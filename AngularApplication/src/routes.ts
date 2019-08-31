import { Route } from '@angular/router';
import { RestaurantIndexComponent } from './app/restaurant/restaurant-index/restaurant-index.component';
import { RestaurantShowComponent } from './app/restaurant/restaurant-show/restaurant-show.component';

export const appRoute = [

  {path: '', redirectTo: 'restaurants' , pathMatch: 'full'},
  {path: 'restaurants', component: RestaurantIndexComponent},
  {path: 'restaurants/:id/cuisines', component: RestaurantShowComponent},

  {path: 'users', loadChildren: './user/user.module#UserModule' },
];
