VolleyballEnrollmentBundle
==========================
This is a bundle utilizing the enrollment component of the Volleyball Scheduling system.

Controllers
-----------
- Active Enrollment Controller
- Attendee Enrollment Controller
- Facility Course Controller
- Passel Enrollment Controller
- Period Controller
- Season Controller
- Week Controller

Entities
--------
- Active Enrollment
- Attendee Class Enrollment
- Attendee Enrollment
- Facility Course
- Passel Enrollment
- Period
- Season
- Week

Repositories
------------
- Active Enrollment Repository
- Attendee Enrollment Repository
- Facility Course Repository
- Passel Enrollment Repository
- Period Repository
- Season Repository
- Week Repository

Routes
------
Route Name | Route Path | Notes
--- | --- | ---
volleyball_attendee_class_enrollment_index  | /attendees/{attendee_slug}/class-enrollments                          |
volleyball_attendee_class_enrollment_show   | /attendees/{attendee_slug}/class-enrollments/{class_enrollment_slug}  |
volleyball_attendee_class_enrollment_create | /attendees/{attendee_slug}/class-enrollments/new                      |
volleyball_attendee_enrollment_index        | /attendees/{attendee_slug}/enrollments                                |
volleyball_attendee_enrollment_show         | /attendees/{attendee_slug}/enrollments/{attendee_enrollment_slug}     |
volleyball_attendee_enrollment_create       | /attendees/{attendee_slug}/enrollments/new                            |   
volleyball_passel_enrollment_index          | /passels/{passel_slug}/enrollments                                    |
volleyball_passel_enrollment_show           | /passels/{passel_slug}/enrollments/{passel_enrollment_slug}           |
volleyball_passel_enrollment_create         | /passels/{passel_slug}/enrollments/new                                |
volleyball_season_index_by_facility         | /facilities/{facility_slug}/seasons                                   |
volleyball_season_index                     | /seasons                                                              |
volleyball_season_show                      | /seasons/{season_slug}                                                |
volleyball_season_create                    | /seasons/new                                                          |
volleyball_week_index_by_season             | /seasons/{season_slug}/weeks                                          |
volleyball_week_index_by_facility           | /facilities/{facility_slug}/weeks                                     | Retrieves weeks form currently active season
volleyball_week_index                       | /weeks                                                                |
volleyball_week_show                        | /weeks/{week_slug}                                                    |
volleyball_week_create                      | /weeks/new                                                            |
volleyball_period_index_by_week             | /weeks/{week_slug}/periods                                            |
volleyball_period_index                     | /periods                                                              |   
volleyball_period_show                      | /periods/{period_slug}                                                |
volleyball_period_create                    | /periods/new                                                          |