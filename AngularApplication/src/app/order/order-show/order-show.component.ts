import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-order-show',
  templateUrl: './order-show.component.html',
  styleUrls: ['./order-show.component.css']
})
export class OrderShowComponent implements OnInit {

  @Input() products: any;
  @Input() address: any;
  @Input() orderId: number;
  @Input() total: number;


  constructor() { }

  ngOnInit() {
  }

}
