OUT_DIR=build

TARGET = haml

all: $(TARGET)
	@mkdir -p $(OUT_DIR)
	haml $(TARGET)/index.haml $(OUT_DIR)/index.html

clean:
	$(RM) -r $(OUT_DIR)
