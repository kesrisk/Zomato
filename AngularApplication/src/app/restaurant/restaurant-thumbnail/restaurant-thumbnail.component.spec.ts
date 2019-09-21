import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RestaurantThumbnailComponent } from './restaurant-thumbnail.component';

describe('RestaurantThumbnailComponent', () => {
  let component: RestaurantThumbnailComponent;
  let fixture: ComponentFixture<RestaurantThumbnailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RestaurantThumbnailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RestaurantThumbnailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
