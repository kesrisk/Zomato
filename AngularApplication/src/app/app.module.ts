import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import { ApiService } from './services/api.service';
import { RestaurantService } from './services/restaurant.service';
import { appRoute } from 'src/routes';
import { RestaurantModule } from './restaurant/restaurant.module';
import { HttpClientModule } from '@angular/common/http';
import { CuisineModule } from './cuisine/cuisine.module';
import { CuisineService } from './services/cuisine.service';
import { AuthService } from './services/auth.service';
import { CartModule } from './cart/cart.module';
import { HeaderComponent } from './layout/header.component';
import { AddressModule } from './address/address.module';
import { UserModule } from './user/user.module';
import { OrderService } from './services/order.service';
import { OrderModule } from './order/order.module';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(appRoute),
    HttpClientModule,
    RestaurantModule,
    CuisineModule,
    CartModule,
    AddressModule,
    OrderModule
  ],
  providers: [
    ApiService,
    RestaurantService,
    CuisineService,
    AuthService,
    UserModule,
    OrderService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
