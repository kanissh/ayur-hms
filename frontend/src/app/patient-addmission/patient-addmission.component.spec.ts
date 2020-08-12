import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PatientAddmissionComponent } from './patient-addmission.component';

describe('PatientAddmissionComponent', () => {
  let component: PatientAddmissionComponent;
  let fixture: ComponentFixture<PatientAddmissionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PatientAddmissionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PatientAddmissionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
