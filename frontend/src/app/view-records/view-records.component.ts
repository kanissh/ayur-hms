import {Component} from '@angular/core';

export interface ViewRecords {
  name: string;
  position: number;
  description: string;
  status: string;
    details: string;
}

const PATIENT_DATA: ViewRecords[] = [
  {position: 1, name: 'Nimal', description: 'dskdjf', status: 'Not Admitted', details: 'edit'},
  {position: 2, name: 'Amal', description: 'ggfg', status: 'Admitted', details: 'edit'},
  {position: 3, name: 'Kamal', description: 'dgh', status: 'Admitted', details: 'edit'},
  {position: 4, name: 'Sunil', description: 'ggfdh', status: 'Not Admitted', details: 'edit'},
  {position: 5, name: 'Rani', description: 'dhadgafa', status: 'Admitted', details: 'edit'}
 
];

/**
 * @title Basic use of `<mat-table>` (uses display flex)
 */
@Component({
  selector: 'table-basic-flex-example',
  styleUrls: ['table-basic-flex-example.css'],
  templateUrl: 'table-basic-flex-example.html',
})
export class TableBasicFlexExample {
  displayedColumns: string[] = ['position', 'name', 'description', 'status', 'details'];
  dataSource = PATIENT_DATA;
}
