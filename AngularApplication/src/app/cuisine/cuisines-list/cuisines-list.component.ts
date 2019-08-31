import { Component, OnInit, Input } from '@angular/core';


@Component({
  selector: 'app-cuisines-list',
  templateUrl: './cuisines-list.component.html',
  styleUrls: ['./cuisines-list.component.css']
})
export class CuisinesListComponent implements OnInit {
  @Input() cuisines: any;
  constructor() { }

  ngOnInit() {
  }

}
