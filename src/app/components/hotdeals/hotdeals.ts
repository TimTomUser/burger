import { Component, Input, signal } from '@angular/core';
@Component({
  selector: 'app-hotdeals',
  imports: [],
  templateUrl: './hotdeals.html',
  styleUrl: './hotdeals.scss',
})
export class Hotdeals {
@Input() contentHotdeals: any = [];
}
