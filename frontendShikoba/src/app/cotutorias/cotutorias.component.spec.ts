import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CotutoriasComponent } from './cotutorias.component';

describe('CotutoriasComponent', () => {
  let component: CotutoriasComponent;
  let fixture: ComponentFixture<CotutoriasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CotutoriasComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CotutoriasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
