import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Menunav } from './menunav';

describe('Menunav', () => {
  let component: Menunav;
  let fixture: ComponentFixture<Menunav>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Menunav]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Menunav);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
