<template>
  <div class="page_about">
    <div class="py-4 bg-dark text-white">
      <div class="container">
        <h1 class="display-3">Contact</h1>
        <p class="lead">
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p>
      </div>
    </div>
    <div class="container content py-5">

      <vue-form method="post" action="/contact-form">
        <div class="mb-3">
          <label for="full_name" class="form-label">Full Name</label>
          <input
            type="text"
            name="full_name"
            id="full_name"
            class="form-control"
            placeholder="Domenico Galileo"
            aria-describedby="fullNameHelper"
          />
          <small id="fullNameHelper" class="text-muted"
            >Type your full name</small
          >
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="text"
            name="email"
            id="email"
            class="form-control"
            placeholder="Domenico@example.com"
            aria-describedby="emailHelper"
          />
          <small id="emailHelper" class="text-muted">Type your email</small>
        </div>

        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input
            type="text"
            name="subject"
            id="subject"
            class="form-control"
            aria-describedby="subjectHelper"
          />
          <small id="subjectHelper" class="text-muted">Type your subject</small>
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea
            class="form-control"
            name="message"
            id="message"
            rows="5"
          ></textarea>
        </div>

        <button type="submit" class="btn btn-dark text-white">
          Send Message
        </button>
      </vue-form>

    </div>
  </div>
</template>

<script>
import VueForm from "../components/VueForm.vue";
export default {
  name: "Contacts",
  components: {
    VueForm,
  },
};
</script>

