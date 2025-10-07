<?php include "header.html" ?>
  <section>
    <h2>Book a Table</h2>
    <p>Reserve your spot with us.</p>
    <form action="book.php" method="POST" style="max-width:400px;margin:0 auto;text-align:left;">
      <label>Name</label>
      <input type="text" name="name" required style="width:100%;padding:8px;margin:5px 0;">
      <label>Email</label>
      <input type="email" name="email" required style="width:100%;padding:8px;margin:5px 0;">
      <label>Date</label>
      <input type="date" name="date" required style="width:100%;padding:8px;margin:5px 0;">
      <label>Time</label>
      <input type="time" name="time" required style="width:100%;padding:8px;margin:5px 0;">
      <label>Guests</label>
      <input type="number" name="guests" min="1" max="20" required style="width:100%;padding:8px;margin:5px 0;">
      <button class="btn" type="submit" style="width:100%;margin-top:10px;">Book Now</button>
    </form>
  </section>
<?php include "footer.html"; ?>
