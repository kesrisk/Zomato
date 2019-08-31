import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RestaurantIndexComponent } from './restaurant-index/restaurant-index.component';
import { RestaurantThumbnailComponent } from './restaurant-thumbnail/restaurant-thumbnail.component';
import { RouterModule } from '@angular/router';
import { RestaurantShowComponent } from './restaurant-show/restaurant-show.component';
import { CuisineModule } from '../cuisine/cuisine.module';
import { CartModule } from '../cart/cart.module';

@NgModule({
  declarations: [
    RestaurantIndexComponent,
    RestaurantThumbnailComponent,
    RestaurantShowComponent
  ],
  imports: [
    CommonModule,
    RouterModule,
    CuisineModule,
    CartModule
  ],
  exports: [
    RestaurantIndexComponent,
    RestaurantShowComponent,
    RestaurantShowComponent
  ]
})
export class RestaurantModule { }
