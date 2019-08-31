import { Route } from '@angular/router';
import { RestaurantIndexComponent } from './app/restaurant/restaurant-index/restaurant-index.component';
import { RestaurantShowComponent } from './app/restaurant/restaurant-show/restaurant-show.component';
import { VerifyOrderComponent } from './app/cart/verify-order/verify-order.component';
import { OrderListComponent } from './app/order/order-list/order-list.component';

export const appRoute = [

  {path: '', redirectTo: 'restaurants' , pathMatch: 'full'},
  {path: 'restaurants', component: RestaurantIndexComponent},
  {path: 'restaurants/:id/cuisines', component: RestaurantShowComponent},
  {path: 'verify-order/:id', component: VerifyOrderComponent},

  {path: 'users', loadChildren: './user/user.module#UserModule' },
  {path: 'orders', component: OrderListComponent},

];
