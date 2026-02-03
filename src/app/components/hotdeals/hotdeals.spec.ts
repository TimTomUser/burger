import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Hotdeals } from './hotdeals';

describe('Hotdeals', () => {
  let component: Hotdeals;
  let fixture: ComponentFixture<Hotdeals>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Hotdeals]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Hotdeals);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
