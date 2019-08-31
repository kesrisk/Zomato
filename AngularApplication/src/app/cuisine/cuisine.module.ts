import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CuisinesListComponent } from './cuisines-list/cuisines-list.component';
import { CuisineThumbnailComponent } from './cuisine-thumbnail/cuisine-thumbnail.component';

@NgModule({
  declarations: [
    CuisinesListComponent,
    CuisineThumbnailComponent
  ],
  imports: [
    CommonModule
  ],
  exports: [
    CuisinesListComponent,
    CuisineThumbnailComponent
  ]
})
export class CuisineModule { }
