import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';


@Component({
  selector: 'app-address-list',
  templateUrl: './address-list.component.html',
  styleUrls: ['./address-list.component.css']
})
export class AddressListComponent implements OnInit {
  @Input() address: any;
  @Output() getSelectedAddress = new EventEmitter;
  constructor() {
  }

  ngOnInit() {

  }

  setToCart() {
    this.getSelectedAddress.emit(this.address);
  }

}
