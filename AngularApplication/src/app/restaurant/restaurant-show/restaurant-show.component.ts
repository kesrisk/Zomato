import { Component, OnInit } from '@angular/core';
import { RestaurantService } from 'src/app/services/restaurant.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-restaurant-show',
  templateUrl: './restaurant-show.component.html',
  styleUrls: ['./restaurant-show.component.css']
})
export class RestaurantShowComponent implements OnInit {
  cuisines: any;
  cartCuisines: any;
  cartTotal: number = 0;
  isAddressPanelHidden: boolean = false;
  restaurant_id: any;

  constructor(private restaurantService: RestaurantService, private route: ActivatedRoute) {
    this.restaurant_id = this.route.snapshot.params['id']
   }

  ngOnInit() {
    this.restaurantService.getCuisines(this.restaurant_id).subscribe(data => {
      this.cuisines = data.data;
    });

    this.restaurantService.getCart(this.restaurant_id).subscribe(data => {
      this.cartCuisines = data;
      data.forEach(cuisine => {
        this.cartTotal += cuisine.cost * cuisine.quantity;
      });
    });
  }

}
