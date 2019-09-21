import { Component, OnInit } from '@angular/core';
import { OrderService } from 'src/app/services/order.service';

@Component({
  selector: 'app-order-list',
  templateUrl: './order-list.component.html',
  styleUrls: ['./order-list.component.css']
})
export class OrderListComponent implements OnInit {

  orders: any[];
  orderDetail: any;
  selectedOrder: any;
  isOrderSelected: boolean = false;


  constructor(private orderService: OrderService) { }

  ngOnInit() {
    this.orderService.getAll().subscribe(data => {
      this.orders = data;
      console.log(data);
    });
  }

}
