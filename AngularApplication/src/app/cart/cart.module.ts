import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CartIndexComponent } from './cart-index/cart-index.component';

@NgModule({
  declarations: [
    CartIndexComponent
  ],
  imports: [
    CommonModule
  ],
  exports: [
    CartIndexComponent
  ]
})
export class CartModule { }
