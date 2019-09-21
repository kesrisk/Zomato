import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RestaurantIndexComponent } from './restaurant-index/restaurant-index.component';
import { RestaurantThumbnailComponent } from './restaurant-thumbnail/restaurant-thumbnail.component';
import { RouterModule } from '@angular/router';
import { RestaurantShowComponent } from './restaurant-show/restaurant-show.component';
import { CuisineModule } from '../cuisine/cuisine.module';
import { CartModule } from '../cart/cart.module';
import { AddressModule } from '../address/address.module';

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
    CartModule,
    AddressModule
  ],
  exports: [
    RestaurantIndexComponent,
    RestaurantShowComponent,
    RestaurantShowComponent
  ]
})
export class RestaurantModule { }
