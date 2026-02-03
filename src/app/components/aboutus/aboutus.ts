import { Component, Input, signal } from '@angular/core';

@Component({
  selector: 'app-aboutus',
  imports: [],
  templateUrl: './aboutus.html',
  styleUrl: './aboutus.scss',
})
export class Aboutus {
@Input() contentAboutus: any = [];
}