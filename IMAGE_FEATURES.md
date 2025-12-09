# Image Features for Royeli Travel Portal

## Overview
This document describes the image functionality that has been added to the Royeli Travel Portal for tours, hotels, cruises, and visa services.

## Features Added

### 1. Featured Images
- **Tour Packages**: Added `featured_image` field to display high-quality images for featured tours
- **Hotels**: Added `featured_image` field for hotel showcases
- **Cruises**: Added `featured_image` field for cruise promotions
- **Visa Services**: Added `featured_image` field for visa service displays

### 2. Extra Images Gallery
- **Service Images Table**: New `service_images` table to store multiple images per service
- **Image Management**: Each service can have multiple extra images with captions
- **Sort Order**: Images can be ordered using the `sort_order` field
- **Active/Inactive**: Images can be marked as active or inactive

### 3. Database Changes

#### New Migrations Created:
- `2025_07_01_000003_add_featured_image_to_visa_services_table.php`
- `2025_07_01_000004_add_featured_image_to_tour_packages_table.php`
- `2025_07_01_000005_add_featured_image_to_hotels_table.php`
- `2025_07_01_000006_add_featured_image_to_cruises_table.php`
- `2025_07_01_000007_create_service_images_table.php`

#### Service Images Table Structure:
```sql
CREATE TABLE service_images (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    service_type VARCHAR(255), -- 'tour', 'hotel', 'cruise', 'visa'
    service_id BIGINT, -- ID of the specific service
    image_path VARCHAR(255),
    caption VARCHAR(255) NULL,
    sort_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 4. Model Updates

#### New Model: ServiceImage
- Handles relationships with all service types
- Provides image URL accessor
- Includes scopes for filtering and ordering

#### Updated Models:
- **TourPackage**: Added `featured_image` field and `images()` relationship
- **Hotel**: Added `featured_image` field and `images()` relationship
- **Cruise**: Added `featured_image` field and `images()` relationship
- **VisaService**: Added `featured_image` field and `images()` relationship

### 5. Controller Updates

All controllers now support:
- **Featured Image Upload**: During create/edit operations
- **Extra Images Upload**: Multiple images with captions
- **Image Deletion**: Remove individual extra images
- **File Storage**: Images stored in `storage/app/public/` with organized folders

### 6. View Updates

#### Tour Package Views:
- **Create/Edit Forms**: Added fields for featured image and extra images
- **Show Page**: Displays featured image and gallery of extra images
- **Index Page**: Shows featured images in tour cards

#### Image Gallery Features:
- **Responsive Grid**: Images displayed in responsive grid layout
- **Modal View**: Click images to view in full-size modal
- **Captions**: Display image captions when available
- **Hover Effects**: Smooth transitions and hover effects

### 7. File Storage Structure

```
storage/app/public/
├── tours/
│   ├── [main tour images]
│   └── extra/
│       └── [extra tour images]
├── hotels/
│   ├── [main hotel images]
│   └── extra/
│       └── [extra hotel images]
├── cruises/
│   ├── [main cruise images]
│   └── extra/
│       └── [extra cruise images]
└── visas/
    ├── [main visa images]
    └── extra/
        └── [extra visa images]
```

### 8. Routes Added

```php
// Image deletion routes
Route::delete('/tours/{tour}/images/{image}', [TourController::class, 'deleteImage']);
Route::delete('/hotels/{hotel}/images/{image}', [HotelController::class, 'deleteImage']);
Route::delete('/cruises/{cruise}/images/{image}', [CruiseController::class, 'deleteImage']);
Route::delete('/visas/{visa}/images/{image}', [VisaController::class, 'deleteImage']);
```

### 9. JavaScript Features

#### Image Modal:
- **Full-size View**: Click images to view in modal
- **Keyboard Navigation**: ESC key to close modal
- **Click Outside**: Click outside image to close modal
- **Caption Display**: Shows image captions in modal

#### Dynamic Form Fields:
- **Add Extra Images**: Button to add more image upload fields
- **Remove Images**: Remove individual image fields
- **Caption Fields**: Text inputs for image captions

### 10. Sample Data

A seeder has been created (`ServiceImageSeeder`) that adds sample images to existing services:
- **Tour Packages**: 3-5 extra images per tour
- **Hotels**: 2-4 extra images per hotel
- **Cruises**: 2-4 extra images per cruise
- **Visa Services**: 1-3 extra images per visa service

### 11. Usage Examples

#### Creating a Tour with Images:
```php
// In TourController::store()
if ($request->hasFile('featured_image')) {
    $validated['featured_image'] = $request->file('featured_image')->store('tours', 'public');
}

// Handle extra images
if ($request->hasFile('extra_images')) {
    foreach ($request->file('extra_images') as $index => $image) {
        if ($image && $image->isValid()) {
            $imagePath = $image->store('tours/extra', 'public');
            $caption = $request->input("image_captions.{$index}", '');
            
            ServiceImage::create([
                'service_type' => 'tour',
                'service_id' => $tour->id,
                'image_path' => $imagePath,
                'caption' => $caption,
                'sort_order' => $index,
                'is_active' => true,
            ]);
        }
    }
}
```

#### Displaying Images in Views:
```php
// Featured image
@if($tour->featured_image_url)
    <img src="{{ $tour->featured_image_url }}" alt="{{ $tour->name }}">
@endif

// Extra images gallery
@foreach($tour->images as $image)
    <img src="{{ $image->image_url }}" alt="{{ $image->caption }}">
@endforeach
```

### 12. Security Considerations

- **File Validation**: Only image files (JPEG, PNG, JPG, GIF) allowed
- **File Size Limit**: Maximum 2MB per image
- **Storage Security**: Images stored in public disk with proper permissions
- **Access Control**: Image deletion requires authentication

### 13. Performance Optimizations

- **Lazy Loading**: Images loaded on demand
- **Responsive Images**: Different sizes for different screen sizes
- **Image Compression**: Optimized image storage
- **Database Indexing**: Proper indexes on service_images table

## Conclusion

The image features provide a comprehensive solution for managing visual content across all service types in the Royeli Travel Portal. The implementation includes proper file management, responsive design, and user-friendly interfaces for both administrators and end users. 