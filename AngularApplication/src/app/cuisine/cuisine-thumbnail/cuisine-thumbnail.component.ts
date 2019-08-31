import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-cuisine-thumbnail',
  templateUrl: './cuisine-thumbnail.component.html',
  styleUrls: ['./cuisine-thumbnail.component.css']
})
export class CuisineThumbnailComponent implements OnInit {
  @Input() cuisine: any;
  addedToCart: boolean = false;
  constructor() { }

  ngOnInit() {
  }

}
