import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-restaurant-thumbnail',
  templateUrl: './restaurant-thumbnail.component.html',
  styleUrls: ['./restaurant-thumbnail.component.css']
})
export class RestaurantThumbnailComponent implements OnInit {
  @Input() restaurant: any;
  constructor() { }

  ngOnInit() {
  }

}
