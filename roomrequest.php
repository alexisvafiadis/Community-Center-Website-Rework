<html>
<link rel="stylesheet" href="style.css">
<form method="post" action="" name="roomrequest-form">
<label>Telephone Number</label>
    <input type="tel" name="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
  </div>
  <div class="form-element">
    <label>Room Number</label>
    <input type="number" name="roomnumber" min="1" max="5" required />
  </div>
  <div class="form-element">
    <label>Date</label>
    <input type="date" name="date" required />
  </div>
  <div class="form-element">
    <label>Start Time</label>
    <select name="starttime" required>
    <option value="A">8 am</option>
    <option value="B">9 am</option>
    <option value="C">10 am</option>
    <option value="D">11 am</option>
    <option value="E">12 pm</option>
    <option value="F">1 pm</option>
    <option value="G">2 pm</option>
    <option value="H">3 pm</option>
    <option value="I">4 pm</option>
    <option value="J">5 pm</option>
    <option value="K">6 pm</option>
    <option value="L">7 pm</option>
    <option value="M">8 pm</option>
    <option value="N">9 pm</option>
    <option value="O">10 pm</option>
    <option value="P">11 pm</option>
    <option value="Q">12 am</option>
    <option value="R">1 am</option>
    </select>
  </div>
  <div class="form-element">
    <label>End Time</label>
    <select name="endtime" required>
    <option value="A">8 am</option>
    <option value="B">9 am</option>
    <option value="C">10 am</option>
    <option value="D">11 am</option>
    <option value="E">12 pm</option>
    <option value="F">1 pm</option>
    <option value="G">2 pm</option>
    <option value="H">3 pm</option>
    <option value="I">4 pm</option>
    <option value="J">5 pm</option>
    <option value="K">6 pm</option>
    <option value="L">7 pm</option>
    <option value="M">8 pm</option>
    <option value="N">9 pm</option>
    <option value="O">10 pm</option>
    <option value="P">11 pm</option>
    <option value="Q">12 am</option>
    <option value="R">1 am</option>
    </select>
  </div>
  <div class="form-element">
    <label>Additional comments and possible flexibilities</label>
    <input type="text" name="comments" />
  </div>
  <button type="submit" name="login" value="login">Request</button>
</form>
</html>