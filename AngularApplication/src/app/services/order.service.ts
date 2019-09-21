import { Injectable } from '@angular/core';
import { ApiService } from './api.service';

@Injectable()
export class OrderService {

  constructor(private api: ApiService) { }

  placeOrder(data) {
    return this.api.post<any>('/orders/place', data, 'orderplace');
  }

  getAll() {
    return this.api.get<any>('/orders', 'get all address');
  }
}
