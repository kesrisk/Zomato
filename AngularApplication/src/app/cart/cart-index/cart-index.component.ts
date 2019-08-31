import { Component, OnInit, Input } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cart-index',
  templateUrl: './cart-index.component.html',
  styleUrls: ['./cart-index.component.css']
})
export class CartIndexComponent implements OnInit {
  @Input() cuisines: any;
  @Input() total: any;
  @Input() restaurant_id: any;

  isLoggedIn: boolean = false;

  constructor(private authService: AuthService, private route: Router) { }

  ngOnInit() {
    if (this.authService.isLoggedIn()) {
      this.isLoggedIn = true;
    }
  }

  placeOrder() {
    this.route.navigate(['/verify-order', this.restaurant_id]);
  }


}
