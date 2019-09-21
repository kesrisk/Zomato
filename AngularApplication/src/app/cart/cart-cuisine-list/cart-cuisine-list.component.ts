import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-cart-cuisine-list',
  templateUrl: './cart-cuisine-list.component.html',
  styleUrls: ['./cart-cuisine-list.component.css']
})
export class CartCuisineListComponent implements OnInit {

  @Input()  cuisines: any[];
  @Output() removeProduct = new EventEmitter();

  constructor() {
    console.log(this.cuisines);
   }

  ngOnInit() { }

  remove(cuisine_id) {

    this.removeProduct.emit(cuisine_id);
  }

}
