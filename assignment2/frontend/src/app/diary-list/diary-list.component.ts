import { Component, OnInit } from '@angular/core';
import { ServerService } from '../server.service';
import { Diary } from '../diary';

@Component({
  selector: 'app-diary-list',
  templateUrl: './diary-list.component.html',
  styleUrls: ['./diary-list.component.css']
})
export class DiaryListComponent implements OnInit {
  diaries: Diary[] = [];

  constructor(private serverService: ServerService) {}


  async ngOnInit(): Promise<void> {
    this.diaries = await this.serverService.getDiaries();
    for (let index = 0; index < this.diaries.length; index++) {
      const element = this.diaries[index];
      const dateRaw = element.created_at;
      const date = new Date(Date.parse(dateRaw))
      this.diaries[index].created_at = date.toISOString().split('T')[0];
    }
  }

}
