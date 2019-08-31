import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-cart-index',
  templateUrl: './cart-index.component.html',
  styleUrls: ['./cart-index.component.css']
})
export class CartIndexComponent implements OnInit {
  @Input() cuisines: any;
  constructor() { }

  ngOnInit() {
  }

}
