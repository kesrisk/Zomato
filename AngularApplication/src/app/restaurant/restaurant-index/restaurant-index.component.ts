import { Component, OnInit } from '@angular/core';
import { RestaurantService } from 'src/app/services/restaurant.service';

@Component({
  selector: 'app-restaurant-index',
  templateUrl: './restaurant-index.component.html',
  styleUrls: ['./restaurant-index.component.css']
})
export class RestaurantIndexComponent implements OnInit {
  restaurants: any;

  constructor(private restaurantService: RestaurantService) { }

  ngOnInit() {
    this.restaurantService.get().subscribe(data => {
      this.restaurants = data;
    });
  }

}
