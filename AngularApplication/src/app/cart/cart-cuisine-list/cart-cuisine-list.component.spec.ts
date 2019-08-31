import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CartCuisineListComponent } from './cart-cuisine-list.component';

describe('CartCuisineListComponent', () => {
  let component: CartCuisineListComponent;
  let fixture: ComponentFixture<CartCuisineListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CartCuisineListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CartCuisineListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
