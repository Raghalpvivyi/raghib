from telethon import TelegramClient, events, sync

# استخدم القيم التي حصلت عليها عند إنشاء التطبيق
api_id = 29767804   # استبدل بـ api_id الذي حصلت عليه
api_hash = '6e06643e96bee6f6deab165a5bf0aa03'   # استبدل بـ api_hash الذي حصلت عليه
phone_number = '+9647719595235'   # استبدل بـ رقم هاتفك
client = TelegramClient('session_name', api_id, api_hash)

client.start(phone_number)

warning_message = """ سيتم حذف رسالتك تلقائيًا ، صاحب الحساب ليس بمزاج يسمح له في الكلام مع احد الرجاء التوقف عن ارسال الرسائل فورًا ، وشكرًا على تفهمك """

delete_private_messages = False

@client.on(events.NewMessage(incoming=True))
async def handle_private_messages(event):
    if delete_private_messages and event.is_private:
        await client.send_message(event.chat_id, warning_message)
        await event.delete()

@client.on(events.NewMessage(pattern='تفعيل الحذف'))
async def activate_delete_private(event):
    global delete_private_messages
    delete_private_messages = True
    await event.respond('تم تفعيل الحذف.')

@client.on(events.NewMessage(pattern='تعطيل الحذف'))
async def disable_delete_private(event):
    global delete_private_messages
    delete_private_messages = False
    await event.respond('تم تعطيل حذف الرسائل.')

feature_enabled = True

@client.on(events.NewMessage)
async def delete_message(event):
    global feature_enabled
    if feature_enabled and '@yousef_labban' in event.raw_text:
        await event.delete()
        await event.respond('الرجاء عدم الإزعاج')

@client.on(events.NewMessage(pattern='تفعيل@'))
async def enable_feature(event):
    global feature_enabled
    feature_enabled = True
    await event.respond('تم تفعيل حذف الرسالة التي تشمل')

@client.on(events.NewMessage(pattern='تعطيل@'))
async def disable_feature(event):
    global feature_enabled
    feature_enabled = False
    await event.respond('تم تعطيل حذف الرسائل التي تشمل ')

client.start()
client.run_until_disconnected()
