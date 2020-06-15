import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PatientRegComponent } from './patient-reg.component';

describe('PatientRegComponent', () => {
  let component: PatientRegComponent;
  let fixture: ComponentFixture<PatientRegComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PatientRegComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PatientRegComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
