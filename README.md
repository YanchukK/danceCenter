## Controllers:


### Всего 7 контроллеров: 

 - Main
 - Branch ( Filial )
 - Price
 - Timetable
 - Auth
 - Admin
 - Teacher
 - Style
 - Group
 - News

| Название | Методы\свойства |Зачем нужны|
|--|--|--|
| Main | index | shows start page |
| Main | showTopNews | shows top news on main page =) |
| Main | showOneTopNews | shows top news on main page =) |
| Main | showTeachers |  |
| Main | showAllStyles |  |
| Main | feedback | for sending mail to administator |
| Branch | index | shows branches ( filials ) page |
| Branch | showAllBrunch |  |
| Branch | showOneBrunch |  |
| Branch | create | |
| Branch | delete | |
| Branch | update | |
| Price | index | shows schedule with prices |
| Price | C | |
| Price | R | |
| Price | U | |
| Price | D | |
| Timetable | index | |
| Timetable | C | |
| Timetable | R | |
| Timetable | D | |
| Timetable | U | |
| Auth |  | валидация форм, скорей всего будет реализовано в риквесте |
| Admin | index | shows dashboard |
| Admin | CRUD for prices | |
| Admin | CRUD for branches | |
| Admin | CRUD for teachers | |
| Admin | CRUD for timetable | |
| Admin | CRUD for groups | |
| Admin | send | for mail sending|
| Admin | createTeachers | only admin can to create accounts for teachers |
| Admin | checkSubscribers | checking users, who would like to start lessons |
| Teacher | index | shows dashboard for teachers|
| News| crud | |
---
Создание и редактирование групп, преподавателей, стилей танцев, 			
расписания, цен, филиалов, новостей, преподавателей **выполняется администратором**.

---
**Преподаватель** может создавать и редактировать только расписание, и редактировать информацию о себе.

---
Вывод информации всех групп, преподавателей, стилей танцев, 			
расписания, цен, филиалов, новостей, преподавателей выполняется с админки ( dashboard ). 
