import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";

import { MainPageComponent } from './main-page/main-page.component';
import { AboutComponent } from './about/about.component';
import { DiaryListComponent } from './diary-list/diary-list.component';
import { AddDiaryComponent } from './add-diary/add-diary.component';

const routes: Routes = [
  {
    path: "",
    redirectTo: "/main",
    pathMatch: "full",
  },
  {
    path: "main",
    component: MainPageComponent,
  },
  {
    path: "about",
    component: AboutComponent,
  },
  {
    path: "diary",
    component: DiaryListComponent,
  },
  {
    path: "add-diary",
    component: AddDiaryComponent,
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
  declarations: [],
})
export class RoutingModule {}
