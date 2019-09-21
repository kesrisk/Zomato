import { Injectable } from '@angular/core';
import { ApiService } from './api.service';

@Injectable()
export class RestaurantService {

  constructor(private api: ApiService) { }

  get() {
    return this.api.get<any>('/restaurants', 'getrestaurants');
  }

  getCuisines(restaurant_id) {
    return this.api.get<any>('/restaurants/' + restaurant_id + '/cuisines', 'get cuisines by id');
  }

  getCart(restaurant_id) {
    return this.api.get<any>('/carts/' + restaurant_id, 'get cart cuisines');
  }
}
