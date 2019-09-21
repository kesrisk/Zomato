import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { RestaurantService } from 'src/app/services/restaurant.service';
import { OrderService } from 'src/app/services/order.service';

@Component({
  selector: 'app-verify-order',
  templateUrl: './verify-order.component.html',
  styleUrls: ['./verify-order.component.css']
})
export class VerifyOrderComponent implements OnInit {
  cartCuisines: any;
  cartTotal: number = 0;
  addressMode: string = 'select';
  isAddressPanelHidden: boolean = true;
  selectedAddress: any;
  isAddressSelected: boolean = false;
  isOrderPlaced: boolean = false;

  constructor(private route: ActivatedRoute, private restaurantService: RestaurantService, private orderService: OrderService) { }

  ngOnInit() {
    this.restaurantService.getCart(this.route.snapshot.params['id']).subscribe(data => {
      this.cartCuisines = data;
      data.forEach(cuisine => {
        this.cartTotal += cuisine.cost * cuisine.quantity;
      });
    });
  }

  setAddress(address) {

    this.selectedAddress = address;
    this.isAddressSelected = true;
  }

  toggleAddressPanel() {

    this.isAddressPanelHidden = !this.isAddressPanelHidden;
  }

  placeOrder() {
    // tslint:disable-next-line: max-line-length
    this.orderService.placeOrder({
      'restaurant_id' : this.route.snapshot.params['id'],
      'promocode_id'  : '',
      'address_id'    : this.selectedAddress.id }).subscribe( () => {
        this.isOrderPlaced = true;
        this.ngOnInit();
      });
  }

}
