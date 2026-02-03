import { Component, Input, signal } from '@angular/core';

@Component({
  selector: 'app-video',
  imports: [],
  templateUrl: './video.html',
  styleUrl: './video.scss',
})
export class Video {
@Input() contentVideo: any = [];
}

