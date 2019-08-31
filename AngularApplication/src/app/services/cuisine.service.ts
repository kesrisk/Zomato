import { Injectable } from '@angular/core';
import { ApiService } from './api.service';

@Injectable()
export class CuisineService {

  constructor(private api:ApiService) { }

  get(restaurant_id) {

  }
}
