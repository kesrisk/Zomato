import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OrderListComponent } from './order-list/order-list.component';
import { OrderShowComponent } from './order-show/order-show.component';

@NgModule({
  declarations: [
    OrderListComponent,
    OrderShowComponent
  ],
  imports: [
    CommonModule
  ],
  exports: [
    OrderListComponent,
    OrderShowComponent
  ]
})
export class OrderModule { }
