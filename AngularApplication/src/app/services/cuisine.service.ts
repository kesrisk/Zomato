import { Injectable } from '@angular/core';
import { ApiService } from './api.service';

@Injectable()
export class CuisineService {

  constructor(private api:ApiService) { }

  addToCart(restaurant_id, cuisine_id) {
    return this.api.post('/carts/' + restaurant_id + '/' + cuisine_id, {}, 'add cuisine to cart');
  }
}
