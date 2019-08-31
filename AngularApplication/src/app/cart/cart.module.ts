import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CartIndexComponent } from './cart-index/cart-index.component';
import { RouterModule } from '@angular/router';
import { VerifyOrderComponent } from './verify-order/verify-order.component';
import { CartCuisineListComponent } from './cart-cuisine-list/cart-cuisine-list.component';
import { AddressModule } from '../address/address.module';


@NgModule({
  declarations: [
    CartIndexComponent,
    VerifyOrderComponent,
    CartCuisineListComponent,
  ],
  imports: [
    CommonModule,
    RouterModule,
    AddressModule
  ],
  exports: [
    CartIndexComponent,
    VerifyOrderComponent,
    CartCuisineListComponent
  ]
})
export class CartModule { }
