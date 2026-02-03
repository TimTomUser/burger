import { Component, Input, signal } from '@angular/core';

@Component({
  selector: 'app-avis',
  imports: [],
  templateUrl: './avis.html',
  styleUrl: './avis.scss',
})
export class Avis {
@Input() contentAvis: any = [];
}
