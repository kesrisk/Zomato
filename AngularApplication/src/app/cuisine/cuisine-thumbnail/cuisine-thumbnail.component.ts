import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { CuisineService } from 'src/app/services/cuisine.service';

@Component({
  selector: 'app-cuisine-thumbnail',
  templateUrl: './cuisine-thumbnail.component.html',
  styleUrls: ['./cuisine-thumbnail.component.css']
})
export class CuisineThumbnailComponent implements OnInit {
  @Input() cuisine: any;
  addedToCart: boolean = false;

  constructor(private route: ActivatedRoute, private cuisineService: CuisineService) { }

  ngOnInit() {
  }

  addToCart() {
    this.cuisineService.addToCart(this.route.snapshot.params['id'], this.cuisine.id).subscribe(data => {
      this.addedToCart = true;
      window.location.reload();
    });
  }
}
