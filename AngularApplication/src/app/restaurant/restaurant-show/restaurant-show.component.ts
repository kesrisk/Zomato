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
  constructor(private restaurantService: RestaurantService, private route: ActivatedRoute) { }

  ngOnInit() {
    this.restaurantService.getCuisines(this.route.snapshot.params['id']).subscribe(data => {
      this.cuisines = data.data;
    });

    this.restaurantService.getCart(this.route.snapshot.params['id']).subscribe(data => {
      this.cartCuisines = data;
    });
  }

}
