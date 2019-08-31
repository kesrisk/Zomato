import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CuisineThumbnailComponent } from './cuisine-thumbnail.component';

describe('CuisineThumbnailComponent', () => {
  let component: CuisineThumbnailComponent;
  let fixture: ComponentFixture<CuisineThumbnailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CuisineThumbnailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CuisineThumbnailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
