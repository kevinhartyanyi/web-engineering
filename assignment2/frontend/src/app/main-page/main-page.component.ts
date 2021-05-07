import { Component, OnInit } from '@angular/core';
import { ServerService } from '../server.service';
import { Diary } from '../diary';

@Component({
  selector: 'app-main-page',
  templateUrl: './main-page.component.html',
  styleUrls: ['./main-page.component.css']
})
export class MainPageComponent implements OnInit {

  entries: number = 0;
  start: string = "";
  end: string = "";

  constructor(private serverService: ServerService) {}

  async ngOnInit(): Promise<void> {
    const diaries = await this.serverService.getDiaries();
    this.entries = diaries.length;

    const dateRawStart = diaries[diaries.length - 1].created_at;
    const dateStart = new Date(Date.parse(dateRawStart))
    this.start = dateStart.toISOString().split('T')[0];

    const dateRawEnd = diaries[0].created_at;
    const dateEnd = new Date(Date.parse(dateRawEnd))
    this.end = dateEnd.toISOString().split('T')[0];
  }

}
