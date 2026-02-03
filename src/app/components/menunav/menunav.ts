import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-menunav',
  imports: [],
  templateUrl: './menunav.html',
  styleUrl: './menunav.scss',
})
export class Menunav {
@Input() liens: any = [];
}
